// air condition
const acRange = document.getElementById("ac-range")
const acValue = document.getElementById("ac-value")
if (acRange && acValue) {
    acValue.textContent = acRange.value
    acRange.addEventListener("input", (event) => {
        acValue.textContent = event.target.value
        postRangeValue(acRange, event.target.value);
    })
}

const acToggle = document.getElementById("ac-toggle");
postToggleValue(acToggle, 'ac');

// tv
const tvToggle = document.getElementById("tv-toggle");
postToggleValue(tvToggle, 'tv');

// audio system
const audioRange = document.getElementById("audio-range");
const audioValue = document.getElementById("audio-value");
if (audioRange && audioValue) {
    audioValue.textContent = audioRange.value
    audioRange.addEventListener("input", (event) => {
        audioValue.textContent = event.target.value
    })
}
const audioToggle = document.getElementById("audio-system-toggle");
postToggleValue(audioToggle, 'audio');

// window
const windowToggle = document.getElementById("window-toggle");
postToggleValue(windowToggle, 'window');

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
postToggleValue(lampToggle, 'lamp');

// curtain
const curtainToggle = document.getElementById("curtain-toggle");
postToggleValue(curtainToggle, 'curtain');


function postRangeValue(targetRange, value) {
    if (targetRange) {
        const room_id = 1;
        $(document).ready(function () {
            const data = {
                'room_id': room_id,
                'range_value': value,
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

function postToggleValue(targetToggle, device) {
    if (targetToggle) {
        targetToggle.addEventListener("click", (e) => {
            const state = e.target.checked;
            const room_id = 1;
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


