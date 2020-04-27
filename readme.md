# Watching Observers

###### Zen Cart Support Thread: https://www.zen-cart.com/showthread.php?226649-Watching-Observers-Support-Thread

As more and more plugins are relying on Zen Cart notifiers to perform their customizations, it can be a developer's debug nightmare when  multiple observers are "watching" for the same event, but one is not  "playing well with others".  It can be a royal-pain to determine who's  making those variable changes.

This simple script loads, presumably, at the very end of the site's  auto-loaders and generates a report indicating what event(s) are being  observed.

Here's a sample of the output:

```
Class (emp_order_observer) is watching for NOTIFY_ORDER_DURING_CREATE_ADDED_ORDER_COMMENT.
Class (emp_order_observer) is watching for NOTIFY_PROCESS_3RD_PARTY_LOGINS.
```

**Note**: This is a *developer tool*, not a "proper" plugin.  There's no language file, no means (although it's open source) to create an entry in the admin's menu.

## Installation

Installation is simple (there are only two files):

1. /includes/auto_loaders/config.watching_observers.php
2. /includes/init_includes/init_watching_observers.php

Just copy those two files to your Zen Cart storefront and, for each page-load, a file named `watching_observers_{page_base}_YYYYMMDD_HHIISS.log` is created in the site's `/logs` sub-directory.

To disable the functionality, either remove those two files or just rename the `config.watching_observers.php` to have a different file extension, e.g. `.php~`.  To re-enable the functionality, just rename that file's extension back to `.php`.

You can also limit the output to *your* IP address.  Either directly edit `init_watching_observers.php`:

```
if (!defined('WATCHING_OBSERVERS_IP')) define('WATCHING_OBSERVERS_IP', '');
```

… changing the empty string to your IP address or create a file in the store's `/includes/extra_datafiles` sub-directory that contains that definition's override.