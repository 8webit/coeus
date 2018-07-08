import { Component, OnInit, EventEmitter, Input, Output } from '@angular/core';

import {values} from 'lodash';

import {PrimaryMenuService} from './shared/primary-menu.service';
import {SettingsService} from '../../shared/settings.service';

import {MenuModel} from '../../shared/menu.model';


@Component({
    selector: 'primary-menu',
    templateUrl: 'primary-menu.component.html',
    styleUrls: ['primary-menu.component.css'],
    providers: [ PrimaryMenuService ]
})

export class PrimaryMenuComponent implements OnInit {
    @Output() onMenuItemClick = new EventEmitter<boolean>();

    menuItems: MenuModel[];
    settings: any;

    constructor(private primaryMenuService: PrimaryMenuService,
                private settingsService: SettingsService) { }

    ngOnInit() {
        this.getMenuItems();
        this.getSettings();
    }

    getMenuItems() {
        this.primaryMenuService.getMenuItems()
                                .subscribe(items => {
                                    this.menuItems = values(items);
                                 } );
    }

    getSettings() {
        this.settingsService.getSettings()
                             .subscribe(settings  => this.settings = settings);
    }

    onItemClick(menuItem: any) {
        this.onMenuItemClick.emit(true);
    }
 }
