function submitFilter() {
    const filterPost = document.getElementById("filterPostForm");
    const submiter = document.getElementById("filterPostFormSubmit");
    const formData = new FormData(filterPost, submiter);

    let url = "/all-posts?page=";

    const urlParams = new URLSearchParams(window.location.search);
    url += urlParams.get("page") || 1;

    for (const [key, value] of formData) {
        if (value != "") {
            url += `&${key}=${value}`;
        }
    }

    window.location.href = window.location.origin + url;

    return false;
}
