# supervisord-mattermost
A collection of scripts to send supervisord notifications to Mattermost

## Usage instructions
1. Set up an **incoming hook** on your Mattermost instance.
1. Set up the incoming hook ID and your Mattermost URL in the `mmLink.php` file.
1. Configure an event listener on your `supervisord.conf`.

### Example supervisord configuration
```
[eventlistener:MM]
command=php --define display_errors="stderr" /path/to/supervisord-mattermost/event.php
events=PROCESS_STATE
```

## Files
- `mmLink.php`: Contains a `sendMmMessage()` function. This function can be called by any PHP script in order to send a hook message to your Mattermost instance
- `event.php`: The supervisord event handler running script
- `sendNOW.php`: A script that sends its arguments as a Mattermost message immediately. Useful to initially test your setup.
