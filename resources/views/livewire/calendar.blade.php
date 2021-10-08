
<div>
    <style>
        #calendar-container {
            position: fixed;
            top: 0;
            left: 300px;
            right: 0;
            bottom: 0;
        }
        #calendar {
            margin: 116px auto;
            padding: 10px;
            max-width: 1100px;
            height: 700px;
        }
    </style>
    <div>
        <div id='calendar-container' wire:ignore>
            <div id='calendar'>

                
            </div>
        </div>
    </div>
    @push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js'></script>
    <script>
        document.addEventListener('livewire:load', function () {
            const Calendar = FullCalendar.Calendar;
            const calendarEl = document.getElementById('calendar');
            const calendar = new Calendar(calendarEl, {
            events: JSON.parse(@this.events),
            eventResize: info => @this.eventChange(info.event),
            eventDrop: info => @this.eventChange(info.event),
            selectable: true,
            editable: true,
            });        
            calendar.render();
        });
       
        create_UUID = () => {
            let dt = new Date().getTime();
            const uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, c => {
                let r = (dt + Math.random() * 16) % 16 | 0;
                dt = Math.floor(dt / 16);
                return (c == 'x' ? r :(r&0x3|0x8)).toString(16);
            });
            return uuid;
        }
        document.addEventListener('livewire:load', function () {
            const Calendar = FullCalendar.Calendar;
            const calendarEl = document.getElementById('calendar');
            const calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                locale: '{{ config('app.locale') }}',
                events: JSON.parse(@this.events),
                editable: true, 
                eventClick: info => {
            if (confirm("You want to delete this event?")) {
                info.event.remove();
                @this.eventRemove(info.event.id);
            }
        },               
                eventResize: info => @this.eventChange(info.event),
                eventDrop: info => @this.eventChange(info.event),
                selectable: true,
                select: arg => {
                    const title = prompt('Titre :');
                    const id = create_UUID();
                    if (title) {
                        calendar.addEvent({
                            id: id,
                            title: title,   
                            start: arg.start,
                            end: arg.end,
                            allDay: arg.allDay
                        });
                        @this.eventAdd(calendar.getEventById(id));
                    };
                    calendar.unselect();
                },
            });        
            calendar.render();
        });

 
    </script>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.css' rel='stylesheet' />
    @endpush
    
</div>



