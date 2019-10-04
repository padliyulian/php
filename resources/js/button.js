// delete button confirm
document.querySelectorAll(".js-form__delete").forEach((el) => {
    el.addEventListener("submit", (ev) => {
        ev.preventDefault();
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                ),
                setTimeout(() => ev.target.submit(), 2000);
            }
        })
    });
});