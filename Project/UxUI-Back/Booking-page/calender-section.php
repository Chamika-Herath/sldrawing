

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jomolhari&display=swap" rel="stylesheet">

<style>
    /* --- Main Wrapper --- */
    .calendar-wrapper {
        position: relative;
        width: 100%;
        /* Desktop: Full viewport height */
        min-height: 100vh;
        
        display: flex;
        justify-content: center;
        align-items: center;
        
        /* FONT UPDATE: Jomolhari */
        font-family: 'Jomolhari', serif;
        box-sizing: border-box;
        overflow: hidden;

        /* Background */
        background: 
            linear-gradient(rgba(20, 0, 40, 0.1), rgba(20, 0, 40, 0.9)),
            url('./assets/calender-wall.png');
        background-size: cover;
        background-position: center;
        
        padding: 40px 20px;
    }

    .calendar-card {
        text-align: center;
        width: 100%;
        max-width: 500px;
        padding: 40px;
        margin-top: 200px;
        /* Glassy effect */
        background: rgba(0, 0, 0, 0.4); /* Slightly darker for better contrast */
        border-radius: 20px;
        border: 1px solid rgba(180, 0, 255, 0.1);
        box-shadow: 0 0 50px rgba(100, 0, 200, 0.2);
        backdrop-filter: blur(5px);
    }

    /* --- Neon Typography --- */
    .month-header {
        font-size: clamp(3rem, 8vw, 4.5rem); /* Responsive sizing */
        font-weight: 400; /* Jomolhari handles weight differently */
        text-transform: uppercase;
        color: white;
        margin: 0;
        line-height: 1;
        /* Purple Neon Glow */
        text-shadow: 
            0 0 5px #fff,
            0 0 10px #fff,
            0 0 20px #bc13fe,
            0 0 40px #bc13fe,
            0 0 80px #bc13fe;
        animation: flicker 3s infinite alternate;
    }

    .year-header {
        font-size: clamp(1.5rem, 4vw, 2rem);
        color: #e0e0e0;
        margin-bottom: 30px;
        text-shadow: 0 0 10px #bc13fe;
        font-weight: 300;
        letter-spacing: 3px;
    }

    /* --- Grid System --- */
    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr); /* 7 Days */
        gap: 15px;
        text-align: center;
    }

    /* Weekday Labels (Sun, Mon...) */
    .weekday {
        font-weight: bold;
        color: #d8b4fe;
        text-transform: uppercase;
        font-size: 1rem;
        margin-bottom: 10px;
        text-shadow: 0 0 5px #bc13fe;
    }

    /* Day Numbers */
    .day {
        position: relative;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: rgba(255, 255, 255, 0.8);
        font-size: 1.3rem;
        border-radius: 8px;
        transition: 0.3s;
        /* Fix for serif numbers looking uncentered */
        padding-top: 3px; 
    }

    /* Hover effect */
    .day:not(.empty):hover {
        background: rgba(188, 19, 254, 0.2);
        color: white;
        cursor: pointer;
    }

    /* --- THE "TODAY" HIGHLIGHT --- */
    .day.today {
        color: #fff;
        background: rgba(188, 19, 254, 0.3);
        border: 2px solid #fff;
        box-shadow: 
            0 0 10px #fff,
            inset 0 0 10px #fff,
            0 0 20px #bc13fe,
            inset 0 0 20px #bc13fe;
        animation: pulse 2s infinite;
    }

    .empty { pointer-events: none; }

    /* Animations */
    @keyframes flicker {
        0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% { opacity: 1; }
        20%, 24%, 55% { opacity: 0.8; } /* softer flicker */
    }

    @keyframes pulse {
        0% { box-shadow: 0 0 10px #fff, 0 0 20px #bc13fe; }
        50% { box-shadow: 0 0 20px #fff, 0 0 40px #bc13fe; }
        100% { box-shadow: 0 0 10px #fff, 0 0 20px #bc13fe; }
    }

    /* --- RESPONSIVENESS --- */
    
    /* Tablet & Small Desktop (Max 900px) */
    @media (max-width: 1024px) {
        .calendar-wrapper {
            /* Remove full height, allow content to flow */
            min-height: auto;
            padding: 80px 20px;

        }
        .calendar-card{
            margin-top: 200px;
        }
    }

    /* Mobile (Max 500px) */
    @media (max-width: 500px) {
        .calendar-wrapper {
            padding: 60px 15px;
        }

        .calendar-card {
            padding: 25px 15px; /* Tighter padding */
            width: 100%;
            margin-top: 100px;
        }

        /* Tighter grid for small screens */
        .calendar-grid { 
            gap: 5px; 
        }

        .weekday {
            font-size: 0.85rem;
            margin-bottom: 5px;
        }

        .day { 
            height: 40px; 
            font-size: 1.1rem; 
        }
    }
</style>


<div class="calendar-wrapper">
    <div class="calendar-card">
        <h1 class="month-header" id="monthName">MONTH</h1>
        <div class="year-header" id="yearNum">YEAR</div>

        <div class="calendar-grid" id="calendarGrid">
            <div class="weekday">Sun</div>
            <div class="weekday">Mon</div>
            <div class="weekday">Tue</div>
            <div class="weekday">Wed</div>
            <div class="weekday">Thu</div>
            <div class="weekday">Fri</div>
            <div class="weekday">Sat</div>
            </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const monthEl = document.getElementById('monthName');
        const yearEl = document.getElementById('yearNum');
        const gridEl = document.getElementById('calendarGrid');

        // 1. Get Current Date specifically for Sri Lanka (Colombo)
        const now = new Date();
        const options = { timeZone: 'Asia/Colombo' };
        
        const getPart = (type) => {
            const formatter = new Intl.DateTimeFormat('en-US', { ...options, [type]: 'numeric' });
            return parseInt(formatter.format(now));
        };
        
        const getMonthName = () => {
            const formatter = new Intl.DateTimeFormat('en-US', { ...options, month: 'long' });
            return formatter.format(now);
        };

        const currentYear = getPart('year');
        const currentMonth = getPart('month') - 1; 
        const currentDay = getPart('day');

        // 2. Set Header Text
        monthEl.textContent = getMonthName();
        yearEl.textContent = currentYear;

        // 3. Calendar Logic
        const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();
        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

        // 4. Render Grid
        const headers = Array.from(gridEl.children).slice(0, 7);
        gridEl.innerHTML = '';
        headers.forEach(header => gridEl.appendChild(header));

        // Add blank spaces
        for (let i = 0; i < firstDayOfMonth; i++) {
            const blank = document.createElement('div');
            blank.classList.add('empty');
            gridEl.appendChild(blank);
        }

        // Add actual days
        for (let i = 1; i <= daysInMonth; i++) {
            const dayDiv = document.createElement('div');
            dayDiv.classList.add('day');
            dayDiv.textContent = i;

            if (i === currentDay) {
                dayDiv.classList.add('today');
            }

            gridEl.appendChild(dayDiv);
        }
    });
</script>
