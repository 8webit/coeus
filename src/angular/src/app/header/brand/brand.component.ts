import { Component, OnInit } from '@angular/core';

import {BrandModel} from './shared/brand.model';

import {SettingsService} from '../../shared/settings.service';

@Component({
    selector: 'brand',
    templateUrl: './brand.component.html',
    styleUrls: ['./brand.component.css'],
})
export class BrandComponent implements OnInit {
    brand: BrandModel;

    constructor(private settingsService: SettingsService) { }

    ngOnInit() {
        this.getSettings();
    }

    getSettings() {
        this.settingsService.getSettings()
                            .subscribe(settings => {
                                this.brand = settings.brand as BrandModel;
                            });
    }

}
