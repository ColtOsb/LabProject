document.addEventListener('DOMContentLoaded', function () {
    const params = new URLSearchParams(window.location.search);
    const msgEl = document.getElementById('form-message');

    if (msgEl) {
        const errorMessages = {
            server:       'Something went wrong. Please try again.',
            unauthorized: 'You must be logged in to submit a resource.',
            invalid_url:  'Please enter a valid URL starting with https://',
        };

        const error   = params.get('error');
        const success = params.get('success');

        if (error && errorMessages[error]) {
            msgEl.textContent = errorMessages[error];
            msgEl.className = 'form-message error';
        } else if (success === 'added') {
            msgEl.textContent = 'Resource submitted! It will appear once reviewed.';
            msgEl.className = 'form-message success';
        }
    }

    const addForm = document.getElementById('add-form');
    if (!addForm) return;

    addForm.addEventListener('submit', function (e) {
        const name        = document.getElementById('resource_name').value.trim();
        const category    = document.getElementById('category').value;
        const url         = document.getElementById('url').value.trim();
        const description = document.getElementById('description').value.trim();

        if (!name || !category || !url || !description) {
            e.preventDefault();
            showError('Please fill in all fields.');
            return;
        }

        if (!url.startsWith('https://') && !url.startsWith('http://')) {
            e.preventDefault();
            showError('URL must start with http:// or https://');
            return;
        }

        if (description.length < 10) {
            e.preventDefault();
            showError('Description must be at least 10 characters.');
        }
    });

    function showError(message) {
        const el = document.getElementById('form-message');
        if (el) {
            el.textContent = message;
            el.className = 'form-message error';
        }
    }
});
