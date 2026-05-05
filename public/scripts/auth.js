document.addEventListener("DOMContentLoaded", function () {
  function showError(message) {
    const el = document.getElementById("form-message");
    if (el) {
      el.textContent = message;
      el.className = "form-message error";
    }
  }

  function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  // ── Login ────────────────────────────────────────────────────────────────
  const loginForm = document.getElementById("login-form");
  if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value;

      if (!email || !password) {
        e.preventDefault();
        showError("Please fill in all fields.");
        return;
      }
      if (!isValidEmail(email)) {
        e.preventDefault();
        showError("Please enter a valid email address.");
        return;
      }
    });
  }

  // ── Register ─────────────────────────────────────────────────────────────
  const registerForm = document.getElementById("register-form");
  if (registerForm) {
    registerForm.addEventListener("submit", function (e) {
      const name = document.getElementById("name").value.trim();
      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value;
      const confirm = document.getElementById("confirm_password").value;

      if (!name || !email || !password || !confirm) {
        e.preventDefault();
        showError("Please fill in all fields.");
        return;
      }
      if (!isValidEmail(email)) {
        e.preventDefault();
        showError("Please enter a valid email address.");
        return;
      }
      if (password.length < 8) {
        e.preventDefault();
        showError("Password must be at least 8 characters.");
        return;
      }
      if (password !== confirm) {
        e.preventDefault();
        showError("Passwords do not match.");
        return;
      }
    });
  }
});
