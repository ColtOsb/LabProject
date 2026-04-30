<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Student Resource Hub - Add Resource</title>
        <link rel="stylesheet" href="./styles.css" />
    </head>
    <body>
        <div class="layout">
            <aside class="sidebar">
              <h1 class="logo">Student Resource Hub</h1>
              <nav class="main-nav">
                <div class="nav-label">Main</div>
                <a href="?page=home">Home</a>
                <a href="?page=about">About</a>
                <div class="nav-label">Resources</div>
                <a href="?page=home" class="sub-link">Textbooks</a>
                <a href="?page=home" class="sub-link">Mental Health</a>
                <a href="?page=home" class="sub-link">Tech Support</a>
                <a href="?page=home" class="sub-link">Career Services</a>
                <div class="nav-label">Account</div>
                <a href="?page=login">Login</a>
                <a href="?page=register">Register</a>
                <a href="?page=add">Add Resources</a>
              </nav>
            </aside>

            <main class="site-main">
                <section class="add-resource">
                    <div class="container">
                        <h2>Add a Resource</h2>
                        <p>
                            Share a useful link with the community. All
                            submissions are reviewed before going live.
                        </p>

                        <form
                            class="add-form"
                            id="add-form"
                            action="?page=add"
                            method="POST"
                        >
                            <div
                                id="form-message"
                                class="form-message"
                                role="alert"
                            ></div>

                            <label for="resource_name">
                                Resource Name
                                <input
                                    id="resource_name"
                                    type="text"
                                    name="resource_name"
                                    placeholder="e.g. Open Library"
                                    required
                                />
                            </label>

                            <label for="category">
                                Category
                                <select id="category" name="category" required>
                                    <option value="" disabled selected>
                                        Select a category
                                    </option>
                                    <option value="Textbooks">Textbooks</option>
                                    <option value="Mental Health">
                                        Mental Health
                                    </option>
                                    <option value="Tech Support">
                                        Tech Support
                                    </option>
                                    <option value="Career Services">
                                        Career Services
                                    </option>
                                </select>
                            </label>

                            <label for="url">
                                URL
                                <input
                                    id="url"
                                    type="url"
                                    name="url"
                                    placeholder="https://example.com"
                                    required
                                />
                            </label>

                            <label for="description">
                                Short Description
                                <textarea
                                    id="description"
                                    name="description"
                                    placeholder="What does this resource offer?"
                                    required
                                ></textarea>
                            </label>

                            <button type="submit" class="button primary">
                                Submit Resource
                            </button>
                        </form>
                    </div>
                </section>
            </main>
        </div>

        <footer class="site-footer">
            <div class="container">
                <p>&copy; 2026 Student Resource Hub</p>
            </div>
        </footer>

        <script src="./scripts/resources.js"></script>
    </body>
</html>
