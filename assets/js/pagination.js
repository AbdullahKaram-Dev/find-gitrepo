$(document).on('click', '.pagination-area .page-link', function (event) {
    event.preventDefault();
    let page = $(this).data('page');
    let data = $('.filter-github-repo-form').serialize();
    filterGithubRepo(data, page);
});
