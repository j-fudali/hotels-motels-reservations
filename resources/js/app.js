import "./bootstrap";
import $ from "jquery";
$(function () {
    $(document).ajaxStart(function () {
        $("#spinner").removeClass("d-none");
    });
    $(document).ajaxComplete(function () {
        $("#spinner").addClass("d-none");
    });
    $("#birth_date").attr("max", new Date().toISOString().split("T")[0]);
    window.setTimeout(function () {
        $(".global-alert")
            .fadeTo(500, 0)
            .slideUp(500, function () {
                $(this).remove();
            });
    }, 3000);
    $(document).on("click", ".pagination a", function (event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr("href"),
            method: "GET",
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                $("#container").html(response);
            },
        });
    });

    $("#filter-form-submit").on("click", function (event) {
        event.preventDefault();
        const data = $("#filter-form").serialize();
        const url = $("#filter-form").attr("action") + "?page=1";
        getFilteredOffers(url, data);
    });
    $("#filter-form-reset").on("click", function (event) {
        const url = $("#filter-form").attr("action") + "?page=1";
        getFilteredOffers(url);
    });
    $("#login-form").on("submit", function (event) {
        event.preventDefault();
        const url = $(this).attr("action");
        const data = $(this).serializeArray();
        login(url, data);
        return false;
    });
    $("#register-form").on("submit", function (event) {
        event.preventDefault();
        const url = $(this).attr("action");
        const data = $(this).serializeArray();
        register(url, data);
        $(this).trigger("reset");
        return false;
    });
    $(document).on("click", ".reserve-room", function (event) {
        event.preventDefault();
        const handler = $(this).attr("href");
        $(`${handler} #starting_date`)
            .attr(
                "min",
                new Date(Date.now() + 3600 * 1000 * 24)
                    .toISOString()
                    .split("T")[0]
            )
            .on("change", function (event) {
                event.preventDefault();
                $(`${handler} #ending_date`)
                    .attr("disabled", false)
                    .attr(
                        "min",
                        new Date(
                            new Date(
                                $(`${handler} #starting_date`).val()
                            ).getTime() +
                                3600 * 1000 * 24
                        )
                            .toISOString()
                            .split("T")[0]
                    );
            });
    });
    $(document).on("click", `#reserve-room-submit`, function (event) {
        event.preventDefault();
        $(`#reserve-room-${$(this).attr("data-id")}`).trigger("submit");
    });
    $(document).on("click", "#update-hotel-form-submit", function (event) {
        event.preventDefault();
        $(`#update-hotel-form-${$(this).attr("data-id")}`).trigger("submit");
    });
    $(document).on("click", "#update-offer-form-submit", function (event) {
        event.preventDefault();
        $(`#update-offer-form-${$(this).attr("data-id")}`).trigger("submit");
    });
    $(document).on("submit", "#update-profile-form", function (event) {
        event.preventDefault();
        const url = $(this).attr("action");
        const data = $(this).serializeArray();
        updateProfile(url, data);
        return false;
    });
});

function getFilteredOffers(url, data) {
    $.ajax({
        url: url,
        method: "GET",
        data: data || null,
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            $("#container").html(response);
        },
    });
}
function getValues(array) {
    let values = {};
    $.each(array, function (i, field) {
        values[field.name] = field.value;
    });
    return values;
}
function login(url, data) {
    const values = getValues(data);
    $.ajax({
        url: url,
        headers: { "X-CSRF-TOKEN": values._token },
        data: JSON.stringify({
            email: values.email,
            password: values.password,
        }),
        type: "POST",
        contentType: "application/json; charset=utf-8",
        cache: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            window.location = response.redirect;
        },
        error: function (errors) {
            $("#errors-list").empty();
            $(".login").append(`<ul id="errors-list" class="list-group"></ul>`);
            $.each(errors.responseJSON.errors, function (key, val) {
                $("#errors-list").append(
                    `<li class="list-group-item list-group-item-danger">${val}</li>`
                );
            });
        },
    });
}
function register(url, data) {
    const values = getValues(data);
    $.ajax({
        url: url,
        headers: { "X-CSRF-TOKEN": values._token },
        data: JSON.stringify({
            first_name: values.first_name,
            last_name: values.last_name,
            birth_date: values.birth_date,
            country: values.country,
            is_hotel_owner: values.is_hotel_owner,
            email: values.email,
            password: values.password,
        }),
        type: "POST",
        contentType: "application/json; charset=utf-8",
        cache: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            $("#errors-list-register").empty();
            $(".sign-up").append(
                `<ul id="errors-list-register" class="list-group"></ul>`
            );
            $("#errors-list-register").append(
                `<div class="alert alert-success" role="alert">${response.messages}</div>`
            );
        },
        error: function (errors) {
            $("#errors-list-register").empty();
            $(".sign-up").append(
                `<ul id="errors-list-register" class="list-group"></ul>`
            );
            $.each(errors.responseJSON.errors, function (key, val) {
                $("#errors-list-register").append(
                    `<li class="list-group-item list-group-item-danger">${val}</li>`
                );
            });
        },
    });
}
function updateProfile(url, data) {
    const values = getValues(data);
    $.ajax({
        url: url,
        data: JSON.stringify({ birth_date: values.birth_date }),
        headers: { "X-CSRF-TOKEN": values._token },
        type: values._method,
        contentType: "application/json; charset=utf-8",
        cache: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            $("#update-profile-form #birth_date").attr(
                "value",
                values.birth_date
            );
            $("#messages-list").empty();
            if ($("#messages-list").length == 0) {
                $("#update-profile-form").append(
                    `<ul id="messages-list" class="list-group mt-3"></ul>`
                );
            }
            $("#messages-list").append(
                `<div class="alert alert-success" role="alert">${response.messages}</div>`
            );
        },
    });
}
