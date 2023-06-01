const roomTitleForRoomId = document.getElementsByClassName('room-title');
let room_id = 1; // default
if (roomTitleForRoomId) {
    room_id = roomTitleForRoomId[0].getAttribute("id");
}

// air condition
const acRange = document.getElementById("ac-range");
const acValue = document.getElementById("ac-value");
if (acRange && acValue) {
    acValue.textContent = acRange.value
    acRange.addEventListener("input", (event) => {
        acValue.textContent = event.target.value;
        postRangeValue(acRange, event.target.value, 'ac', room_id);
    })
}

const acModeHeat = document.getElementById("ac-radio-heat");
const acModeCool = document.getElementById("ac-radio-cool");

if (acModeHeat) {
    acModeHeat.addEventListener("click", () => {
        postACModeValue(1, 'ac', room_id);
        console.log(acModeHeat.checked);
        console.log(acModeCool.checked);
    })
}
if (acModeCool) {
    acModeCool.addEventListener("click", () => {
        postACModeValue(0, 'ac', room_id);
        console.log(acModeHeat.checked);
        console.log(acModeCool.checked);
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
                cache: false,
                success: function (data) {
                    console.log(data);
                },
                error: function (xhr) {
                    console.error(xhr);
                }
            })


        })
    }
}

function postToggleValue(targetToggle, device, room_id) {
    if (targetToggle) {
        targetToggle.addEventListener("click", (e) => {
            const state = e.target.checked;
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
                    cache: false,
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (xhr) {
                        console.error(xhr);
                    }
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
            cache: false,
            success: function (data) {
                console.log(data);
            },
            error: function (xhr) {
                console.error(xhr);
            }
        })
    })

}


