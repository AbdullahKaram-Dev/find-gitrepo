$(document).ready(function () {
    $('.filter-github-repo-form').submit(function (event) {
        event.preventDefault();
        let data = $(this).serialize();
        filterGithubRepo(data);
    });
});