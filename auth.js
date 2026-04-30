document.addEventListener('DOMContentLoaded', function () {
    const params = new URLSearchParams(window.location.search);
    const msgEl = document.getElementById('form-message');

    if (msgEl) {
        const errorMessages = {
            invalid:     'Invalid email or password.',
            email_taken: 'An account with that email already exists.',
            server:      'Something went wrong. Please try again.',
        };

        const error   = params.get('error');
        const success = params.get('success');

        if (error && errorMessages[error]) {
            msgEl.textContent = errorMessages[error];
            msgEl.className = 'form-message error';
        } else if (success === 'registered') {
            msgEl.textContent = 'Account created! You can now log in.';
            msgEl.className = 'form-message success';
        }
    }

    const loginForm = document.getElementById('login-form');
    if (loginForm) {
        loginForm.addEventListener('submit', function (e) {
            const email    = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;

            if (!email || !password) {
                e.preventDefault();
                showError('Please fill in all fields.');
            }
        });
    }

    const registerForm = document.getElementById('register-form');
    if (registerForm) {
        registerForm.addEventListener('submit', function (e) {
            const name     = document.getElementById('name').value.trim();
            const email    = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const confirm  = document.getElementById('confirm_password').value;

            if (!name || !email || !password || !confirm) {
                e.preventDefault();
                showError('Please fill in all fields.');
                return;
            }

            if (password.length < 8) {
                e.preventDefault();
                showError('Password must be at least 8 characters.');
                return;
            }

            if (password !== confirm) {
                e.preventDefault();
                showError('Passwords do not match.');
            }
        });
    }

    function showError(message) {
        const el = document.getElementById('form-message');
        if (el) {
            el.textContent = message;
            el.className = 'form-message error';
        }
    }
});
