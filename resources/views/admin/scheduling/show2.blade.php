@extends('layouts.Header')

@section('content')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var initialLocaleCode = 'pt-br';
            var localeSelectorEl = document.getElementById('locale-selector');
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'listMonth,dayGridMonth'
                },
                initialDate: new Date(),
                locale: initialLocaleCode,
                buttonIcons: true, // show the prev/next text
                selectable: true,
                selectMirror: true,
                select: function(arg) {
                    var title = prompt('Evadadasde:');
                    if (title) {
                        calendar.addEvent({
                            title: title,
                            start: arg.start,
                            end: arg.end,
                            allDay: arg.allDay
                        })
                    }
                    calendar.unselect()
                },
                eventClick: function(arg) {
                    if (confirm('Deletar Agendamento ?')) {
                        window.open(arg.url);
                    }
                },
                weekNumbers: false,
                navLinks: false, // can click day/week names to navigate views
                editable: false,
                dayMaxEvents: true, // allow "more" link when too many events
                events: [
                    @foreach ($scheduling as $item)
                        {
                        title: '{{ $item->nomeCliente }}',
                        url: 'localhost:8000/admin/home',
                        start: '{{ $item->dataAgendamento }}',
                        },
                    @endforeach
                ]
            });
            // timeGridWeek,timeGridDay,
            calendar.render();

            // build the locale selector's options
            calendar.getAvailableLocaleCodes().forEach(function(localeCode) {
                var optionEl = document.createElement('option');
                optionEl.value = localeCode;
                optionEl.selected = localeCode == initialLocaleCode;
                optionEl.innerText = localeCode;
                localeSelectorEl.appendChild(optionEl);
            });

            // when the selected option changes, dynamically change the calendar option
            localeSelectorEl.addEventListener('change', function() {
                if (this.value) {
                    calendar.setOption('locale', this.value);
                }
            });

        });
    </script>
    <style>
        #top {
            background: rgb(209, 31, 31);
            border-bottom: 1px solid #ddd;
            padding: 0 10px;
            line-height: 40px;
            font-size: 12px;
        }

        #calendar {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 10px;
        }

    </style>


    {{-- @dd($scheduling); --}}

    <!-- Begin Page Content -->
    <div class="d-flex justify-content-between mt-2">
        <h2>Agendamento</h2>
        <a href="{{ route('admin.new-scheduling') }}" class="btn btn-sm btn-success d-flex justify-content-center">Novo</a>
    </div>

    <div id='calendar'></div>

@endsection
