console.log('events');

const events = {};

$(document).ready(function () {
    console.log('document ready');
    events.init();
});

events.init = function () {
    const eventsContainer = $('#eventsContainer');
    if (eventsContainer.length) {
        events.handlers();
    }
};

events.handlers = function () {
    console.log('handlers');

    $('body').on('click', '.s-event_item button', function(e) {
        e.preventDefault();

        const eventId = $(this).closest('.s-event_item').data('event-id');

        const apiUrlEventUpdate = `/api/event/update/${eventId}`;

        const status = $(this).closest('.s-event_item').find('select').val();

        console.log(eventId);
        console.log(status);

        const params = {
            url: apiUrlEventUpdate,
            method: 'post',
            format: 'json',
            data: {
                status: status
            }
        };

        $.ajax(params).done(function (response) {
            if (response.data) {
                window.location.href = window.location.href;
            }
        });
    });

};
