<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Student Resource Hub - About</title>
        <link rel="stylesheet" href="./styles.css" />
    </head>
    <body>
        <div class="layout">
            <?php include __DIR__ . "/partials/sidebar.php"; ?>

            <main class="site-main">
                <section class="about">
                    <div class="container">
                        <h2>About This Project</h2>
                        <p>
                            Student Resource Hub is a free, open directory of
                            helpful resources for college students worldwide. It
                            is not tied to any specific university — it is built
                            to help any student find what they need.
                        </p>
                        <p>
                            Our goal is to bring textbooks, mental health
                            support, tech tools, and career help into one simple
                            place. For this first version, we are focusing on a
                            clear layout and simple navigation so that later we
                            can plug in real logins, databases, and search
                            features without redesigning everything.
                        </p>
                        <p>
                            Over time, we imagine students contributing their
                            favorite links, rating resources, and filtering by
                            major or country. Demo 1 is just the visual
                            foundation that the rest of the project will grow
                            on.
                        </p>
                    </div>
                </section>

                <section class="team">
                    <div class="container">
                        <h3>The Team</h3>
                        <div class="team-grid">
                            <article class="team-member">
                                <div class="avatar"></div>
                                <h4>Caleb</h4>
                                <p>Main Contributor</p>
                                <p class="role-notes">
                                    Demo 1: Idea, HTML, CSS
                                </p>
                            </article>

                            <article class="team-member">
                                <div class="avatar"></div>
                                <h4>Colton</h4>
                                <p>Main Contributor</p>
                                <p class="role-notes">
                                    Demo 1: Idea, PowerPoint, Word doc
                                </p>
                            </article>
                        </div>
                    </div>
                </section>
            </main>
        </div>

        <footer class="site-footer">
            <div class="container">
                <p>&copy; 2026 Student Resource Hub</p>
            </div>
        </footer>
    </body>
</html>
