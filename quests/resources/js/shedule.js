console.log('shedule init');

const app = {};

$(document).ready(function () {
    console.log('document ready');
    app.init();
});

app.init = function () {

    app.sheduleContainer = $('#sheduleContainer');

    console.log(app.sheduleContainer);

    if (app.sheduleContainer.length) {
        app.getShedule();
        app.handlers();
    }

};


app.getShedule = function (startDate = '') {
    console.log(app.sheduleContainer);

    const currentDate = $('#calendarContainer input#start').val();

    const questId = app.sheduleContainer.data('quest-id');

    console.log(questId);

    let apiUrlShedule = startDate ? `/api/events/${questId}/${startDate}` : `/api/events/${questId}/${currentDate}`;

    const params = {
        url: apiUrlShedule,
        method: 'get',
        format: 'json'
    };

    $.ajax(params).done(function (response) {
        let html = '';

        for (const [date, times] of Object.entries(response.data)) {
            html += '<div>';
            html += app.renderShedule('date', date);
            for (const [time, status] of Object.entries(times)) {
                html += app.renderShedule('time', time, `${date} ${time}`, status)
            }


            html += '</div>';
            console.log(date);
            console.log(times);
        }
        app.sheduleContainer.empty();
        app.sheduleContainer.append(html);
        console.log(response.data);
    });

};

/**
 * @param type
 *
 * @param title
 * @param datetime
 * @param status
 * @return string html
 */

app.renderShedule = function (type, title, datetime = '', status = 'empty') {

    let html = '';
    switch (type) {
        case 'date':
            html = `<div>${title}</div>`;
            break;
        case 'time':
            html = `<div class="s-time_item ${status === 'empty' ? 's-time_item_textwhite s-empty' : 's-busy'}" data-datetime="${datetime}" data-status="${status}">${title}</div>`;
            break;
    }

    return html;

};

app.handlers = function () {
    $('body').on('change', '#calendarContainer input#start', function() {
        app.getShedule($(this).val());
        console.log(22);

    });
    $('body').on('click', '.s-time_item[data-status="empty"]', function() {
        $('.s-time_item[data-status="empty"]').each(function() {
            $(this).removeClass('s-selected-time');
        });
        $(this).addClass('s-selected-time');
        $('#reservQuestForm input[name="date"]').val($(this).data('datetime'));

    });
};








