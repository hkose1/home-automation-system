const currDate = new Date(Date.now());
if (!localStorage.getItem("initialDate")) {
    localStorage.setItem("initialDate", currDate);
}
const currMonth = currDate.getMonth();
// fall: 5...8 winter: -10..-3 spring: 10...15 summer: 18...25

function getRandomTemp(start, end) {
    return parseInt(Math.random() * (end - start + 1)) + start;
}

function initializeDefaultTemp(currMonth) {
    switch (currMonth) {
        case 8:
        case 9:
        case 10:
            return getRandomTemp(5, 8);
        case 11:
        case 0:
        case 1:
            return getRandomTemp(-10, -3);
        case 2:
        case 3:
        case 4:
            return getRandomTemp(10, 15);
        case 5:
        case 6:
        case 7:
            return getRandomTemp(18, 25);
    }
}

function getDefaultTemp() {
    let defaultTemp;
    if (localStorage.getItem("defaultTemp")) {
        const initialHours = new Date(localStorage.getItem("initialDate")).getHours();
        const now = new Date(Date.now());
        if (Math.abs(initialHours - now.getHours()) >= 4) {
            defaultTemp = initializeDefaultTemp(currMonth);
            localStorage.setItem("defaultTemp", defaultTemp);
            localStorage.setItem("initialDate", now);
        } else {
            defaultTemp = localStorage.getItem("defaultTemp");
        }
    } else {
        defaultTemp = initializeDefaultTemp(currMonth);
        localStorage.setItem("defaultTemp", defaultTemp);
    }
    return parseInt(defaultTemp);
}

function acEffectOnTemp(acCurrValue) {
    return 0.15 * acCurrValue;
}

function calculateFinalTemp(acCurrValue, defaultTemp, acMode) {
    // if the acMode is true then it is mode is Heat otherwise it is mode Cool
    return parseFloat(defaultTemp + acEffectOnTemp(acCurrValue) * (acMode ? 1 : -1)).toPrecision(2);
}
function getCurrentTemp(room_id) {
    const temp = document.getElementById("temp"+room_id);
    return parseFloat(temp.innerText).toPrecision(2);
}
function getAcMode() {
    return document.querySelector("input[type='radio'][name='ac-mode-radio']:checked").value == 'heat' ? 1 : 0;
}

function animateTemperatureValue(id, defaultTemp, finalTemp, duration) {
    return new Promise((resolve, reject) => {
        try {
            const obj = document.getElementById(id);

            const range = finalTemp - defaultTemp;

            const minTimer = 50;

            let stepTime = Math.abs(Math.floor(duration / range));
            stepTime = Math.max(stepTime, minTimer);

            const startTime = new Date().getTime();
            const endTime = startTime + duration;

            let timer;

            function run() {
                const now = new Date().getTime();
                const remaining = Math.max((endTime - now) / duration, 0);
                const value = Math.round(finalTemp - (remaining * range));
                obj.innerHTML = value + '&#8451';
                if (value == finalTemp) {
                    clearInterval(timer);
                }
            }

            timer = setInterval(run, stepTime);
            run();
            resolve();
        } catch (err) {
            reject(err);
        }
    })
}