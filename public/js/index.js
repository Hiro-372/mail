function pushCalendar(id) {
    'use strict';
    
    if (confirm('カレンダーに追加しますか？')) {
        document.getElementById(`form_${id}`).submit();
    }
}