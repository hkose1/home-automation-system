const roomTitleForRoomId = document.getElementsByClassName('room-title');
let room_id = 1; // default
if (roomTitleForRoomId) {
    room_id = roomTitleForRoomId[0].getAttribute("id");
}

// air condition
async function runAnimation(room_id) {
    if (acValue.textContent != 0) {
        await animateTemperatureValue("temp" + room_id, getCurrentTemp(room_id), calculateFinalTemp(acValue.innerText, getDefaultTemp(), getAcMode()), 6000);
        postACTemperature(room_id, calculateFinalTemp(acValue.innerText, getDefaultTemp(), getAcMode()));
    }
}
const acRange = document.getElementById("ac-range");
const acValue = document.getElementById("ac-value");
if (acRange && acValue) {
    acValue.textContent = acRange.value
    acRange.addEventListener("input", (event) => {
        acValue.textContent = event.target.value;
        postRangeValue(acRange, acValue.textContent, 'ac', room_id);
        runAnimation(room_id);
    })
}

const acModeHeat = document.getElementById("ac-radio-heat");
const acModeCool = document.getElementById("ac-radio-cool");

if (acModeHeat) {
    acModeHeat.addEventListener("click", () => {
        postACModeValue(1, 'ac', room_id);
        runAnimation(room_id);
    })
}
if (acModeCool) {
    acModeCool.addEventListener("click", () => {
        postACModeValue(0, 'ac', room_id);
        runAnimation(room_id);
    })
}

const acToggle = document.getElementById("ac-toggle");
postToggleValue(acToggle, 'ac', room_id);

// tv
const tvToggle = document.getElementById("tv-toggle");
postToggleValue(tvToggle, 'tv', room_id);

// audio system
const audioRange = document.getElementById("audio-range");
const audioValue = document.getElementById("audio-value");
if (audioRange && audioValue) {
    audioValue.textContent = audioRange.value
    audioRange.addEventListener("input", (event) => {
        audioValue.textContent = event.target.value;
        postRangeValue(audioRange, event.target.value, 'audio', room_id);
    })
}
const audioToggle = document.getElementById("audio-system-toggle");
postToggleValue(audioToggle, 'audio', room_id);

// window
const windowToggle = document.getElementById("window-toggle");
postToggleValue(windowToggle, 'window', room_id);

// windows animation
const windowObj = document.getElementById("window");
if (windowObj) {
    windowObj.addEventListener("onload", windowRobbingAnimation(windowObj, 10));
}
function windowRobbingAnimation(windowObj, duration) {
    alert("ROBBING THROUGH WINDOWS!!!");
    duration = parseInt(duration);
    if (duration < 5) {
        duration = 5;
    }
    // from second to milisecond
    duration = duration * 1000;
    const initialColor = windowObj.style.backgroundColor;
    const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
    function beep() {
        const oscillator = audioCtx.createOscillator();
        const gainNode = audioCtx.createGain();

        oscillator.connect(gainNode);
        gainNode.connect(audioCtx.destination);

        gainNode.gain.value = 0.5;
        oscillator.frequency.value = 600;
        oscillator.type = 'triangle';

        oscillator.start();

        setTimeout(
            function () {
                oscillator.stop();
            },
            duration / 1000 * 40
        );
    };
    let startTime = new Date().getTime();
    let endTime = startTime + duration;
    function bgDanger() {
        beep();
        if (windowObj.style.backgroundColor == initialColor) {
            windowObj.style.backgroundColor = "red";
        } else {
            windowObj.style.backgroundColor = initialColor;
        }
        if (new Date().getTime() >= endTime) {
            clearInterval(changer);
        }
    }
    const changer = setInterval(bgDanger, 1000);
    bgDanger();
    windowObj.style.backgroundColor = initialColor;
}

// lamp
const lampToggle = document.getElementById("lamp-toggle");
if (lampToggle) {
    lampToggle.addEventListener("click", (e) => {
        const lampIcon = document.getElementById("lamp-icon");
        if (e.target.checked) {
            lampIcon.setAttribute("src", "./assets/image/devices/lamp-on.avif")
        } else {
            lampIcon.setAttribute("src", "./assets/image/devices/lamp-off.avif")
        }
    })
}
postToggleValue(lampToggle, 'lamp', room_id);

// curtain
const curtainToggle = document.getElementById("curtain-toggle");
postToggleValue(curtainToggle, 'curtain', room_id);


function postRangeValue(targetRange, value, device, room_id) {
    if (targetRange) {
        $(document).ready(function () {
            const data = {
                'room_id': room_id,
                'range_value': value,
                'device': device
            }
            $.ajax({
                type: "POST",
                url: "save_changes.php",
                data: JSON.stringify(data),
                dataType: 'text',
                async: false,
                contentType: "application/json",
                cache: false
            })


        })
    }
}

function postToggleValue(targetToggle, device, room_id) {
    const calculateTogglingValue = (deviceName) => {
        const deviceNameforToggling = deviceName + room_id + 'toggling';
        if (!localStorage.getItem(deviceNameforToggling)) {
            localStorage.setItem(deviceNameforToggling, 0);
        } else {
            localStorage.setItem(deviceNameforToggling, parseInt(localStorage.getItem(deviceNameforToggling)) + 1);
        }
    }
    if (targetToggle) {
        targetToggle.addEventListener("click", (e) => {
            const state = e.target.checked;
            calculateTogglingValue(device);
            if (device == 'ac') {
                if (!state) {
                    acRange.setAttribute('disabled', 'true');
                    acModeHeat.setAttribute('disabled', 'true');
                    acModeCool.setAttribute('disabled', 'true');
                } else {
                    acRange.removeAttribute('disabled');
                    acModeHeat.removeAttribute('disabled');
                    acModeCool.removeAttribute('disabled');
                }
            } else if (device == 'audio') {
                if (!state) {
                    audioRange.setAttribute('disabled', 'true');
                } else {
                    audioRange.removeAttribute('disabled');
                }
            }
            $(document).ready(function () {
                const data = {
                    'room_id': room_id,
                    'state': state,
                    'device': device
                }
                $.ajax({
                    type: "POST",
                    url: "save_changes.php",
                    data: JSON.stringify(data),
                    dataType: 'text',
                    async: false,
                    contentType: "application/json",
                    cache: false
                })
            })
        })
    }

}

function postACModeValue(value, device, room_id) {
    $(document).ready(function () {
        const data = {
            'room_id': room_id,
            'mode_value': value,
            'device': device
        }
        $.ajax({
            type: "POST",
            url: "save_changes.php",
            data: JSON.stringify(data),
            dataType: 'text',
            async: false,
            contentType: "application/json",
            cache: false
        })
    })

}

function postACTemperature(room_id, value) {
    $(document).ready(function () {
        const data = {
            'room_id': room_id,
            'temperature_value': value
        }
        $.ajax({
            type: "POST",
            url: "./producer/producer.php",
            data: JSON.stringify(data),
            dataType: 'text',
            async: false,
            contentType: "application/json",
            cache: false
        })
    })
}

const deleteBtns = document.querySelectorAll("button[id$='-delete']");
for (const deleteBtn of deleteBtns) {
    deleteBtn.addEventListener("click", () => {
        deleteDevice(room_id, deleteBtn.getAttribute('name'));
        setTimeout(() => {
            location.reload();
        }, 100);
    })
}

function deleteDevice(room_id, device) {
    $(document).ready(function () {
        const data = {
            'room_id': room_id,
            'device': device,
            'delete_device': true
        }
        $.ajax({
            type: "POST",
            url: "save_changes.php",
            data: JSON.stringify(data),
            dataType: 'text',
            async: false,
            contentType: "application/json",
            cache: false
        })
    })
}


function addDevice(room_id, device) {
    $(document).ready(function () {
        const data = {
            'room_id': room_id,
            'device': device,
            'add_device': true
        }
        $.ajax({
            type: "POST",
            url: "save_changes.php",
            data: JSON.stringify(data),
            dataType: 'text',
            async: false,
            contentType: "application/json",
            cache: false,
            success: function (data, textStatus, jqXHR) {
                console.log('success');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('fail');
            }
        })
    })
}

const dropdownMenu = document.getElementById("dropdown-add-device-menu");
const devicesList = [['ac', acToggle], ['tv', tvToggle], ['audio', audioToggle], ['window', windowToggle],
['lamp', lampToggle], ['curtain', curtainToggle]];
const menuItems = {
    'ac': 'Air Conditioner',
    'tv': 'Television',
    'audio': 'Audio System',
    'window': 'Windows',
    'lamp': 'Lamp',
    'curtain': 'Curtain'
}

if (dropdownMenu) {
    let hasAll = true;
    for (const device of devicesList) {
        if (device[1] == null) {
            hasAll = false;
            addChildToDropdownMenu(room_id, device[0], menuItems[device[0]]);
        }
    }
    if (hasAll) {
        const hasAllDevices = document.createElement("p")
        hasAllDevices.innerText = "This room has already all devices."
        hasAllDevices.style.marginLeft = "3px";
        hasAllDevices.style.marginRight = "3px";
        dropdownMenu.appendChild(hasAllDevices)
    }
}

function getDropdownBtn() {
    const addDeviceBtn = document.createElement("button")
    addDeviceBtn.setAttribute("class", "dropdown-item")
    addDeviceBtn.setAttribute("type", "button")
    return addDeviceBtn;
}

function addChildToDropdownMenu(room_id, deviceId, deviceName) {
    const btn = getDropdownBtn();
    btn.innerText = deviceName;
    dropdownMenu.appendChild(btn);
    btn.addEventListener("click", () => {
        addDevice(room_id, deviceId);
        setTimeout(() => {
            location.reload();
        }, 100);
    });
}