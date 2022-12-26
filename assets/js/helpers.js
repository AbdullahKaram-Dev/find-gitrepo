document.getElementById("created").defaultValue = "2020-01-01";
function filterGithubRepo(data, page = 1) {
    $.ajax({
        url: "github.php?page=" + page,
        type: "GET",
        data: data,
        success: function (response) {
            let githubRepoList = $('.github-repo-list').find('tbody');
            githubRepoList.html(``);
            if (response.items.length > 0) {
                $.each(response.items, function (key, value) {
                    let tr = $('<tr/>');
                    tr.append("<td>" + value.id + "</td>");
                    tr.append("<td>" + value.name + "</td>");
                    tr.append("<td>" + value.html_url + "</td>");
                    tr.append("<td>" + value.description + "</td>");
                    tr.append("<td>" + value.stargazers_count + "</td>");
                    tr.append("<td>" + value.forks_count + "</td>");
                    tr.append("<td>" + value.has_issues + "</td>");
                    githubRepoList.append(tr);
                });
                let paginationArea = $('.pagination-area');
                paginationArea.html(``);
                if(response.pages_count > 1){
                    let pagination = '<nav aria-label="Page navigation example"><ul class="pagination">';
                    for (let i = 1; i <= response.pages_count; i++) {
                        let classActive = (i == response.current_page) ? 'active' : '';
                        let classDisabled = (i == response.current_page) ? 'disabled' : '';
                        pagination += `<li class="page-item ${classActive}"><a class="page-link ${classDisabled}" href="javascript:void(0)" data-page="${i}">${i}</a></li>`;
                    }
                    pagination += '</ul></nav>';
                    paginationArea.append(pagination);
                }
            }else{
                alert('No data found for this search');
            }
        },
        error: function (response) {
            if (response.status === 422) {
                $.each(response.responseJSON.errors, function (key, value) {
                    $.each(value, function (key, value) {
                        alert(value);
                    });
                });
            }
        }
    });
}
