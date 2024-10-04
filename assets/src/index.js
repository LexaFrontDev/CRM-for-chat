document.addEventListener('DOMContentLoaded', function () {
    const messageBar = document.querySelector('.bar[data-messages]');
    const userBar = document.querySelector('.bar[data-users]');
    const messageInput = document.querySelector('.messages-input');
    const userInput = document.querySelector('.users-input');
    const messageCount = parseInt(messageInput.value);
    const userCount = parseInt(userInput.value);
    const maxCount = Math.max(messageCount, userCount);
    const messageHeight = maxCount ? (messageCount / maxCount) * 300 : 0;
    const userHeight = maxCount ? (userCount / maxCount) * 300 : 0;

    messageBar.style.height = messageHeight + 'px';
    userBar.style.height = userHeight + 'px';
    messageBar.textContent = messageCount;
    userBar.textContent = userCount;


    // console.log("Message Count:", messageCount);
    // console.log("User Count:", userCount);
});
