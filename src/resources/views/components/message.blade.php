<style>
    .message {
        border: double 4px #ccc;
        margin: 10px;
        padding: 10px;
        background-color: #fafafa;
    }

    .msg-title {
        margin: 10px 20px;
        color: #999;
        font-size: 16px;
        font-weight: bold;
    }

    .msg-content {
        margin: 10px 20px;
        color: #aaa;
        font-size: 12px;
    }
</style>

<div class="message">
    <p class="msg-title">{{ $msgTitle }}</p>
    <p class="msg-content">{{ $msgContent }}</p>
</div>
