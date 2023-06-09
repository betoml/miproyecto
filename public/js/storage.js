// ==========================================================================
// Plyr storage
// ==========================================================================

import utils from './utils';

class Storage {
    constructor(player) {
        this.enabled = player.config.storage.enabled;
        this.key = player.config.storage.key;
    }

    // Check for actual support (see if we can use it)
    static get supported() {
        if (!('localStorage' in window)) {
            return false;
        }

        const test = '___test';

        // Try to use it (it might be disabled, e.g. user is in private mode)
        // see: https://github.com/sampotts/plyr/issues/131
        try {
            window.localStorage.setItem(test, test);
            window.localStorage.removeItem(test);
            return true;
        } catch (e) {
            return false;
        }
    }

    get(key) {
        const store = window.localStorage.getItem(this.key);

        if (!Storage.supported || utils.is.empty(store)) {
            return null;
        }

        const json = JSON.parse(store);

        return utils.is.string(key) && key.length ? json[key] : json;
    }

    set(object) {
        // Bail if we don't have localStorage support or it's disabled
        if (!Storage.supported || !this.enabled) {
            return;
        }

        // Can only store objectst
        if (!utils.is.object(object)) {
            return;
        }

        // Get current storage
        let storage = this.get();

        // Default to empty object
        if (utils.is.empty(storage)) {
            storage = {};
        }

        // Update the working copy of the values
        utils.extend(storage, object);

        // Update storage
        window.localStorage.setItem(this.key, JSON.stringify(storage));
    }
}

export default Storage;
