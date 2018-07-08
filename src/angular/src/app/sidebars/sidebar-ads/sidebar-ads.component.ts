import { Component, OnInit } from '@angular/core';

import { SettingsService } from '../../shared/settings.service';

@Component({
  selector: 'app-sidebar-ads',
  templateUrl: './sidebar-ads.component.html',
  styleUrls: ['./sidebar-ads.component.css']
})
export class SidebarAdsComponent implements OnInit {
  settings: any;

  constructor(private settingsService: SettingsService) { }

  ngOnInit() {
    this.getSettings();
  }

  getSettings() {
    this.settingsService.getSettings()
                        .subscribe(result => this.settings = result.ad);
  }

}
