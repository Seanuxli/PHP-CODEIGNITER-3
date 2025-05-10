function confirmDelete(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('deleteForm-' + id).submit();
        }
    });
}

function confirmBan(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You want to ban this account!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = BASE_URL + 'Admin_Control/Ban_User/' + id;
        }
    });
}

function confirmUnban(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You want to unban this account!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = BASE_URL + 'Admin_Control/Unban_User/' + id;
        }
    });
}