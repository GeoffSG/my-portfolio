<?php
// Include the JSONReader class
require_once __DIR__ . '/../../controller/ShowcaseController.php';
?>
<section>
    <div class="container theme-primary">
        <h2 class="section-heading">Past Projects</h2>
        <p class="section-description">
            Here is a collection of projects I have previously worked on.
        </p>
        <div class="box">
            <div class="grid col-3">
                <?php foreach ($showcases as $showcase): ?>
                    <div class="card theme-secondary">
                        <div class="card-box">
                            <div class="card-heading">
                                <h2>
                                    <a class="card-link" href="<?= $showcase->getLink(); ?>" target="_blank">
                                        <?= $showcase->getTitle(); ?>
                                    </a>
                                </h2>
                            </div>
                            <div class="card-content">
                                <p>
                                    <?= $showcase->getDescription(); ?>
                                </p>
                                <div class="links">
                                    <ul>
                                        <li><a href="<?= $showcase->getLink(); ?>" target="_blank">View Project</a></li>
                                        <li><a href="<?= $showcase->getRepo(); ?>" target="_blank">View Repository</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="container theme-secondary">
        <h2 class="section-heading">Code Examples</h2>
        <p class="section-description">
            Here are some examples of code that I have written and have found interesting to share. Some are just
            snippets I found interesting enough to share, while others are my solutions to a challenge set by <a
                href="https://www.frontendmentor.io/home">Frontend Mentor</a>.
        </p>
        <div class="box">
            <div class="grid col-3">
                <?php foreach ($examples as $example): ?>
                    <div class="card theme-primary">
                        <div class="card-box">
                            <div class="card-heading">
                                <h2>
                                    <a href="<?= $example->getLink(); ?>" target="_blank">
                                        <?= $example->getTitle(); ?><br>
                                    </a>
                                    <small>
                                        <?= $example->getSubtitle(); ?>
                                    </small>
                                </h2>
                            </div>
                            <div class="card-preview">
                                <a href="<?= $example->getLink(); ?>" target="_blank"><img
                                        src="<?= $example->getPreview(); ?>"
                                        alt="Preview of the <?= $example->getTitle(); ?>"></a>
                            </div>
                            <div class="card-content">
                                <p>
                                    <?= $example->getDescription(); ?>
                                </p>
                                <div class="links">
                                    <ul>
                                        <li><a href="<?= $example->getLink(); ?>" target="_blank">View Project</a></li>
                                        <li><a href="<?= $example->getRepo(); ?>" target="_blank">View Repository</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>