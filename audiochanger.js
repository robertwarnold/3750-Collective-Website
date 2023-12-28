// Sample titles and time segments
const playlist = [
    { title: "Start", time: 0 },
    { title: "Before Drop", time: 96.594692 },
    { title: "Drop", time: 242.803929 },
    { title: "After Drop", time: 247.633664},
    { title: "Intermission", time: 346.423690 },
    { title: "End", time: 437.749580 },
    // Add more titles
];

const audio = document.getElementById("audio-player");
const playlistDiv = document.getElementById("playlist");
const playPauseButton = document.getElementById("play-pause");
const rewindButton = document.getElementById("rewind");
const fastForwardButton = document.getElementById("fast-forward");
const audioFileNameDiv = document.getElementById("audio-file-name");

let isPlaying = false;

// Function to generate playlist buttons
function generatePlaylist() {
    playlist.forEach((item, index) => {
        const button = document.createElement("button");
        button.textContent = item.title;
        button.addEventListener("click", () => playTitle(index));
        playlistDiv.appendChild(button);
    });
}

// Function to play a specific title segment
function playTitle(index) {
    const item = playlist[index];
    audio.currentTime = item.time;
    audio.play();
}

// Event listener for play/pause button
playPauseButton.addEventListener("click", () => {
    if (isPlaying) {
        audio.pause();
        playPauseButton.textContent = "Play";
    } else {
        audio.play();
        playPauseButton.textContent = "Pause";
    }
    isPlaying = !isPlaying;
});

// Event listener for rewind button
rewindButton.addEventListener("click", () => {
    audio.currentTime -= 5; // Rewind 5 seconds
});

// Event listener for fast-forward button
fastForwardButton.addEventListener("click", () => {
    audio.currentTime += 5; // Fast forward 5 seconds
});

// Timer function to update current time display and trigger actions
audio.addEventListener("timeupdate", () => {
    // Update the current time display
    const currentTimeDisplay = document.getElementById("current-time");
    currentTimeDisplay.textContent = formatTime(audio.currentTime);

    // Check if it's time to pause based on the selected title's time segment
    const currentTitle = getCurrentTitle(audio.currentTime);
    if (currentTitle !== -1) {
        audio.pause();
        playPauseButton.textContent = "Play";
        isPlaying = false;
        // Implement your logic for handling title change here
    }
});

// Utility function to format time (e.g., 01:30)
function formatTime(time) {
    const minutes = Math.floor(time / 60);
    const seconds = Math.floor(time % 60);
    return `${minutes}:${(seconds < 10 ? '0' : '')}${seconds}`;
}

// Utility function to get the index of the title to play based on the current time
function getCurrentTitle(currentTime) {
    for (let i = 0; i < playlist.length; i++) {
        if (currentTime >= playlist[i].time && (i === playlist.length - 1 || currentTime < playlist[i + 1].time)) {
            return i;
        }
    }
    return -1; // No matching title found
}

// Display the audio file name
audioFileNameDiv.textContent = "Audio File Name: sample_audio.mp3";

// Function to add a new title to the playlist
function addTitle() {
    const newTitle = prompt("Enter the title for the new segment:");
    if (newTitle) {
        const currentTime = audio.currentTime;
        playlist.push({ title: newTitle, time: currentTime });
        updatePlaylist();
    }
}

// Function to remove the current title from the playlist
function removeLastAddedTitle() {
    if (playlist.length > 0) {
        playlist.pop(); // Remove the last item
        updatePlaylist();
    }
}

// Function to update the playlist buttons
function updatePlaylist() {
    // Clear the existing playlist
    playlistDiv.innerHTML = "";

    // Generate the updated playlist
    generatePlaylist();

    // Reset the audio
    audio.load();
}

// Event listeners for Add and Remove buttons
const addTitleButton = document.getElementById("add-title");
addTitleButton.addEventListener("click", addTitle);

const removeTitleButton = document.getElementById("remove-title");
removeTitleButton.addEventListener("click", removeLastAddedTitle);

// Initialize the playlist and event listeners
generatePlaylist();
