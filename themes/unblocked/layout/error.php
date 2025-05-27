<!-- $keywords; in product.php -->
<style>
    .font-display {
        margin-top: 14px;
        overflow: hidden;
        -o-text-overflow: ellipsis;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 4;
        overflow-wrap: break-word;
    }

    .not_found_suggestions {
        margin-top: 22px;
        margin-bottom: 8px !important;
        font-weight: 600;
    }

    .keywords-found {
        color: var(--white2);
    }
</style>
<div class="row mt-32">
    <div class="game__content">
        <h1 class="fs-3 fw-bold link-title2">Search results</h1>
        <span class="font-display">Your search -
            <span>
                <em class="fs-5 fw-bold keywords-found"> " <?php echo $keywords; ?> "</em>
            </span> - did not match any documents.
        </span>
        <p class="not_found_suggestions">Suggestions:</p>
        <ul>
            <li>Make sure that all words are spelled correctly.</li>
            <li>Try different keywords.</li>
            <li>Try more general keywords.</li>
        </ul>
    </div>
</div>