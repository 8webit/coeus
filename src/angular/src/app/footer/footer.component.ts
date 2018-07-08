import { Component, OnInit } from '@angular/core';

import { SettingsService } from '../shared/settings.service';

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.css']
})
export class FooterComponent implements OnInit {
  settings: any;

  constructor(private settingsService: SettingsService) { }

  ngOnInit() {
    this.getSettings();
  }

  getSettings() {
    this.settingsService.getSettings()
                          .subscribe(res => this.settings = res);
  }
}
