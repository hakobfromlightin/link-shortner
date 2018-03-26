/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.swal = require('sweetalert2/dist/sweetalert2.all');

$(document).ready(function () {
    $(document).on('click', '.link-delete', function (e) {
        e.preventDefault();
        let row = $(this).closest('tr');

        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete!'
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: '/links/' + row.data('id'),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'delete',
                    success: function (result) {
                        row.remove();
                        if (result.message) {
                            swal({
                                title: 'Success!',
                                text: result.message,
                                type: 'success',
                                timer: 2000
                            }).catch(function () {
                                //do nothing
                            });
                        }
                    },
                    error: function () {
                        swal({
                            title: 'Error!',
                            text: 'Something went wrong, please try again',
                            type: 'error'
                        });
                    }
                });
            }
        }).catch(function () {
            //do nothing
        });
    });

    $(document).on('click', '#shorten-link', function (e) {
        e.preventDefault();
        let original = $('#link').val();

        $.ajax({
            url: '/links',
            data: {
                original: original
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            success: function (result) {
                if (result.message) {
                    $('#link').val(result.data.shortened);

                    swal({
                        title: 'Success!',
                        text: result.message,
                        type: 'success',
                        timer: 2000
                    }).catch(function () {
                        //do nothing
                    });
                }
            },
            error: function (response) {
                swal({
                    title: 'Error!',
                    text: 'Something went wrong, please try again',
                    type: 'error'
                });
            }
        });
    });
});
