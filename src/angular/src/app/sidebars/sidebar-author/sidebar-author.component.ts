import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Params } from '@angular/router';

import 'rxjs/add/operator/mergeMap';
import 'rxjs/add/observable/of';

import {has, isEmpty} from 'lodash';

import { AuthorService } from '../../author/shared/author.service';
import { SettingsService } from '../../shared/settings.service';
import { PostService } from '../../posts/shared/post.service';
import { Observable } from 'rxjs/Observable';

@Component({
  selector: 'app-sidebar-author',
  templateUrl: './sidebar-author.component.html',
  styleUrls: ['./sidebar-author.component.css'],
  providers: [AuthorService, PostService, SettingsService]
})
export class SidebarAuthorComponent implements OnInit {
  params: Params;
  author: any;
  settings: any;

  constructor(private authorService: AuthorService,
              private activatedRoute: ActivatedRoute,
              private postService: PostService,
              private settingsService: SettingsService) { }

  ngOnInit() {
    this.getAuthor();
  }

  getAuthor() {
    this.activatedRoute.params.mergeMap(params => {
      this.params = params;

      return this.settingsService.getSettings();
    }).mergeMap(settings => {
      this.settings = settings.sidebar.author;

      if (this.settings.auto_detect && this.params.child_slug) {
        return <any>this.postService.getPostBySlug(this.params.child_slug);
      }else {
        return <any>this.authorService.getAuthorBySlug(this.settings.name);
      }
    }).subscribe(result => {
        if (!isEmpty(result)) {
          if (has(result[0], 'avatar_urls') ) {
            this.author = result[0];
          }else {
            this.author = result[0]._embedded.author[0];
          }
        }
    });
  }
}
