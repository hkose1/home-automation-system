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
// postACTemperature(room_id, getDefaultTemp());