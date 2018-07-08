import { Component, OnInit, Input } from '@angular/core';
import { Title } from '@angular/platform-browser';

import {has} from 'lodash';

import { SettingsService } from '../shared/settings.service';

import { MetaService } from '../shared/meta.service';
import { PostModel } from '../posts/shared/post.model';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css'],
})
export class HomeComponent implements OnInit {
  settings: any;
  @Input() page: PostModel;

  constructor(private settingsService: SettingsService,
              private titleService: Title,
              private metaService: MetaService) {}

  ngOnInit(): void {
    this.getSettings();
    this.setTitle();
    this.updateMeta();
  }
  getSettings() {
    this.settingsService.getSettings()
                        .subscribe(res => this.settings = res.home);
  }

  setTitle() {
    this.titleService.setTitle('Welcome');
  }

  updateMeta() {
    let image = [];

    if (has(this.page._embedded, 'wp:featuredmedia')) {
      const sizes = this.page._embedded['wp:featuredmedia'][0].media_details.sizes;
      const thumbnail = has(sizes, 'large') ? sizes.large : sizes.full;

      image[0] = thumbnail.source_url;
      image[1] = thumbnail.width;
      image[2] = thumbnail.height;
    }
    this.metaService.update(this.page.title.rendered,
                            this.page.link,
                            this.page.excerpt.rendered,
                            image);
  }
}
