import {Component, OnInit} from '@angular/core';
import {SettingsService} from './shared/settings.service';
import { Title } from '@angular/platform-browser';

@Component({
    selector: 'app-root',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.css']
})
export class AppComponent  implements  OnInit {
  settings: any;

  constructor(private settingsService: SettingsService, private titleService: Title) {}

  ngOnInit() {
    this.getSettings();
  }

  getSettings() {
    this.settingsService.getSettings()
        .subscribe(result => this.settings = result );
  }
}
