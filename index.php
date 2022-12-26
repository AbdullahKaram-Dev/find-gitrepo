<!DOCTYPE html>
<html lang="en">
<head>
    <title>GitHub-Repo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/pace.css">
</head>
<body>

<div class="container">
    <h2>Find GitHub Repositories</h2>
    <form class="form-inline filter-github-repo-form">
        <div class="form-group">
            <label for="language">Language:</label>
            <select class="form-control" id="language" name="language" required>
                <option value="PHP">PHP</option>
                <option value="JavaScript">JavaScript</option>
                <option value="Python">Python</option>
            </select>
        </div>
        <div class="form-group">
            <label for="order_by">Order By:</label>
            <select class="form-control" id="order_by" name="order_by" required>
                <option value="stars">Stars</option>
                <option value="forks">Forks</option>
                <option value="help-wanted-issues">Help Wanted Issues</option>
                <option value="updated">Updated</option>
            </select>
        </div>
        <div class="form-group">
            <label for="per_page">Per Page:</label>
            <select class="form-control" id="per_page" name="per_page" required>
                <option value="20" selected>20</option>
                <option value="30">30</option>
                <option value="50">50</option>
            </select>
        </div>
        <div class="form-group">
            <label for="created">Created</label>
            <input type="date" class="form-control" id="created" name="created" required>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <div class="github-repo-list">
        <h3>GitHub Repositories</h3>
        <table id="github-repo-table" class="table table-bordered">
            <thead>
            <tr>
                <th>Repository ID</th>
                <th>Repository Name</th>
                <th>Repository URL</th>
                <th>Repository Description</th>
                <th>Repository Stars</th>
                <th>Repository Forks</th>
                <th>Repository Has Issues</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
            <tr>
                <th colspan="7" class="text-center">no data found yet please submit with your filter preferable</th>
            </tr>
            <tfoot>
            <tr>
                <th colspan="7" class="text-center pagination-area"></th>
            </tr>
            </tfoot>
        </table>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <script src="assets/js/helpers.js"></script>
    <script src="assets/js/submit-github-repo-form.js"></script>
    <script src="assets/js/pagination.js"></script>
</body>
</html>