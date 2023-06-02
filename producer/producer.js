// calculatin of temperature and humidty dynamicly
const currDate = new Date(Date.now());
const currMonth = currDate.getMonth();

// fall: 5 winter: -10 spring: 15 summer: 25
let defaultTemp;
switch(currMonth) {
    case 8:
    case 9:
    case 10:
        defaultTemp = 5;
        break;
    case 11:
    case 0:
    case 1:
        defaultTemp = -10;
        break;
    case 2:
    case 3:
    case 4:
        defaultTemp = 15;
        break;
    case 5:
    case 6:
    case 7:
        defaultTemp = 25;
        break;
}

const acRange2 = document.getElementById("ac-range");
const acValue2 = document.getElementById("ac-value");
acRange2.addEventListener("change", () => {
    console.log(acValue2.innerText);
})

function acEffectOnTemp(acCurrValue) {
    return 0.2 * acCurrValue;
}


console.log("default temp");
console.log();