import { Component, OnInit } from '@angular/core';

import {has} from 'lodash';

import { PostService } from '../../posts/shared/post.service';
import { PostModel } from '../../posts/shared/post.model';

@Component({
  selector: 'app-sidebar-recent-posts',
  templateUrl: './sidebar-recent-posts.component.html',
  styleUrls: ['./sidebar-recent-posts.component.css'],
  providers: [PostService]
})
export class SidebarRecentPostsComponent implements OnInit {
  posts: PostModel[];

  constructor(private postService: PostService) { }

  ngOnInit() {
    this.getPosts();
  }

  getPosts() {
    this.postService.getPosts(5)
                    .subscribe(posts => this.posts = posts);
  }

  getFeatureImageUrl(featured_media: any): string {
    if (has(featured_media.media_details.sizes, 'small')) {
      return featured_media.media_details.sizes.small.source_url;
    }else {
     return featured_media.source_url;
    }
  }
}
