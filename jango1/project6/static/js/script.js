// ========================================
// Reading Progress Bar
// ========================================
function updateReadingProgress() {
  const readingProgressBar = document.getElementById("reading-progress");

  if (!readingProgressBar) return;

  const windowHeight =
    document.documentElement.scrollHeight -
    document.documentElement.clientHeight;
  const scrolled = window.scrollY;
  const scrollPercent = windowHeight > 0 ? (scrolled / windowHeight) * 100 : 0;

  readingProgressBar.style.width = scrollPercent + "%";
}

window.addEventListener("scroll", updateReadingProgress);

// ========================================
// Dark Mode Toggle
// ========================================
function initThemeToggle() {
  const themeToggleBtn = document.querySelector(".theme-toggle");
  const htmlElement = document.documentElement;

  // Get saved theme from localStorage or default to 'light'
  const savedTheme = localStorage.getItem("theme") || "light";
  htmlElement.setAttribute("data-theme", savedTheme);
  updateThemeIcon(savedTheme);

  // Toggle theme on button click
  if (themeToggleBtn) {
    themeToggleBtn.addEventListener("click", () => {
      const currentTheme = htmlElement.getAttribute("data-theme");
      const newTheme = currentTheme === "light" ? "dark" : "light";

      htmlElement.setAttribute("data-theme", newTheme);
      localStorage.setItem("theme", newTheme);
      updateThemeIcon(newTheme);
    });
  }
}

function updateThemeIcon(theme) {
  const themeToggleBtn = document.querySelector(".theme-toggle");
  if (themeToggleBtn) {
    themeToggleBtn.textContent = theme === "light" ? "🌙" : "☀️";
  }
}

// ========================================
// Poll Voting System
// ========================================
function initPollVoting() {
  const pollBoxes = document.querySelectorAll(".poll-box");

  pollBoxes.forEach((pollBox) => {
    const voteBtn = pollBox.querySelector(".btn-vote");
    const pollOptions = pollBox.querySelectorAll('input[type="radio"]');

    if (voteBtn) {
      voteBtn.addEventListener("click", () => {
        const selectedOption = Array.from(pollOptions).find(
          (option) => option.checked,
        );

        if (!selectedOption) {
          alert("Silakan pilih salah satu opsi terlebih dahulu");
          return;
        }

        // Simulate vote submission
        submitVote(pollBox, selectedOption.value);
      });
    }
  });
}

function submitVote(pollBox, selectedValue) {
  // This would typically send data to the backend
  // For now, we'll just update the UI

  const pollOptions = pollBox.querySelectorAll(".poll-option");
  const totalVotes = 100; // Simulated total

  pollOptions.forEach((option) => {
    const radio = option.querySelector('input[type="radio"]');
    const resultBar = option.querySelector(".poll-result-bar");
    const percentage = option.querySelector(".poll-percentage");

    if (radio.value === selectedValue) {
      // Update the selected option's result bar
      const fill = resultBar.querySelector(".poll-result-fill");
      fill.style.width = "45%"; // Simulated percentage
      percentage.textContent = "45%";

      // Disable all options after voting
      pollOptions.forEach((opt) => {
        opt.querySelector('input[type="radio"]').disabled = true;
      });
    }
  });

  // Show success message
  alert("Suara Anda telah dicatat. Terima kasih!");
}

// ========================================
// AI Summary Generator
// ========================================
function initAISummary() {
  const generateSummaryBtns = document.querySelectorAll(
    ".btn-generate-summary",
  );

  generateSummaryBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      const aiSummaryBox = btn.closest(".ai-summary");
      const summaryContent = aiSummaryBox.querySelector(".ai-summary-content");

      // Show loading state
      btn.textContent = "Generating...";
      btn.disabled = true;

      // Simulate API call to generate summary
      setTimeout(() => {
        // In a real scenario, this would call your Django backend
        summaryContent.textContent =
          "Ringkasan lengkap artikel telah dihasilkan oleh AI. Artikel ini membahas tentang keberlanjutan dan dampaknya terhadap lingkungan global...";
        btn.textContent = "Generate Full Summary";
        btn.disabled = false;
      }, 2000);
    });
  });
}

// ========================================
// Listen to Article (Text-to-Speech)
// ========================================
function initListenToArticle() {
  const listenBtns = document.querySelectorAll(".btn-listen");

  listenBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      const articleContent =
        btn.closest(".article-card")?.querySelector(".article-excerpt")
          ?.textContent || "Fitur audio sedang dimuat...";

      // Check if browser supports Web Speech API
      const SpeechSynthesisUtterance = window.SpeechSynthesisUtterance;
      const speechSynthesis = window.speechSynthesis;

      if (!SpeechSynthesisUtterance || !speechSynthesis) {
        alert("Browser Anda tidak mendukung fitur Text-to-Speech");
        return;
      }

      // Cancel any ongoing speech
      if (speechSynthesis.speaking) {
        speechSynthesis.cancel();
        btn.textContent = "🎧 Listen to Article";
        return;
      }

      // Create speech utterance
      const utterance = new SpeechSynthesisUtterance(articleContent);
      utterance.lang = "id-ID"; // Indonesian language
      utterance.rate = 1.0;
      utterance.pitch = 1.0;

      // Update button text while speaking
      utterance.onstart = () => {
        btn.textContent = "⏸ Stop Playing";
      };

      utterance.onend = () => {
        btn.textContent = "🎧 Listen to Article";
      };

      // Start speaking
      speechSynthesis.speak(utterance);
    });
  });
}

// ========================================
// Share Article
// ========================================
function initShareButtons() {
  const shareButtons = document.querySelectorAll(".share-btn");

  shareButtons.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();

      const articleTitle =
        document.querySelector(".article-title")?.textContent ||
        "Check this article";
      const articleUrl = window.location.href;

      if (btn.classList.contains("twitter")) {
        const twitterUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(articleTitle)}&url=${encodeURIComponent(articleUrl)}`;
        window.open(twitterUrl, "_blank", "width=600,height=400");
      } else if (btn.classList.contains("linkedin")) {
        const linkedinUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(articleUrl)}`;
        window.open(linkedinUrl, "_blank", "width=600,height=400");
      } else if (btn.classList.contains("copy")) {
        navigator.clipboard
          .writeText(articleUrl)
          .then(() => {
            alert("Link telah disalin ke clipboard!");
          })
          .catch(() => {
            alert("Gagal menyalin link");
          });
      }
    });
  });
}

// ========================================
// Category Filter
// ========================================
function initCategoryFilter() {
  const categoryPills = document.querySelectorAll(".category-pill");

  categoryPills.forEach((pill) => {
    pill.addEventListener("click", () => {
      // Remove active class from all pills
      categoryPills.forEach((p) => p.classList.remove("active"));

      // Add active class to clicked pill
      pill.classList.add("active");

      // Here you would typically filter articles based on category
      const category = pill.textContent.trim();
      console.log("Filtering articles by category:", category);
    });
  });
}

// ========================================
// Engagement Interactions (Like, Comment, Share)
// ========================================
function initEngagementButtons() {
  const engagementItems = document.querySelectorAll(".engagement-item");

  engagementItems.forEach((item) => {
    item.addEventListener("click", () => {
      const icon = item.querySelector(".engagement-icon");
      const count = item.querySelector(".engagement-count");

      if (icon.textContent.includes("❤")) {
        // Like button
        if (item.classList.contains("liked")) {
          item.classList.remove("liked");
          count.textContent = parseInt(count.textContent) - 1;
        } else {
          item.classList.add("liked");
          count.textContent = parseInt(count.textContent) + 1;
        }
      }
    });
  });
}

// ========================================
// Initialize All Features on Page Load
// ========================================
document.addEventListener("DOMContentLoaded", () => {
  initThemeToggle();
  initPollVoting();
  initAISummary();
  initListenToArticle();
  initShareButtons();
  initCategoryFilter();
  initEngagementButtons();
  updateReadingProgress();
  initAvatarMenu();
});

// Avatar menu: toggles logout menu or redirects to login when unauthenticated
function initAvatarMenu() {
  const avatarBtn = document.getElementById('avatarBtn');
  const avatarMenu = document.getElementById('avatarMenu');
  if (!avatarBtn) return;

  const isAuth = avatarBtn.dataset.auth === '1';
  // const isStaff = avatarBtn.dataset.staff === '1';

  avatarBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    if (!isAuth) {
      // not logged in -> go to login page
      window.location.href = '/login/';
      return;
    }

    const expanded = avatarBtn.getAttribute('aria-expanded') === 'true';
    if (expanded) {
      avatarMenu.hidden = true;
      avatarBtn.setAttribute('aria-expanded', 'false');
    } else {
      avatarMenu.hidden = false;
      avatarBtn.setAttribute('aria-expanded', 'true');
    }
  });

  // Close menu on outside click
  document.addEventListener('click', (e) => {
    if (!avatarBtn.contains(e.target) && avatarMenu && !avatarMenu.contains(e.target)) {
      avatarMenu.hidden = true;
      avatarBtn.setAttribute('aria-expanded', 'false');
    }
  });
}

// ========================================
// Smooth Scroll for Anchor Links
// ========================================
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute("href"));
    if (target) {
      target.scrollIntoView({
        behavior: "smooth",
        block: "start",
      });
    }
  });
});

// ========================================
// Lazy Loading for Images
// ========================================
if ("IntersectionObserver" in window) {
  const imageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const img = entry.target;
        img.src = img.dataset.src;
        img.classList.add("loaded");
        observer.unobserve(img);
      }
    });
  });

  document
    .querySelectorAll("img[data-src]")
    .forEach((img) => imageObserver.observe(img));
}
