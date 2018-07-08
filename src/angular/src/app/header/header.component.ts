import {Component, OnInit} from '@angular/core';

import {SettingsService} from '../shared/settings.service';

@Component({
    selector: 'app-header',
    templateUrl : './header.component.html',
    styleUrls: [ './header.component.css' ]
})

export class HeaderComponent implements OnInit {
    settings: any;
    is_menu_active = false;
    show_search_field = false;

    constructor(private settingsService: SettingsService) {}

    ngOnInit() {
        this.getSettings();
    }

    getSettings() {
        this.settingsService.getSettings()
                            .subscribe(settings =>
                                this.settings = settings.header);
    }

    togglePrimaryMenu() {
        this.is_menu_active = !this.is_menu_active;
    }
    toggleSearchField() {
        this.show_search_field = !this.show_search_field;
    }

    onMenuItemClick() {
        if (this.is_menu_active) {
            this.togglePrimaryMenu();
        }
    }
}

