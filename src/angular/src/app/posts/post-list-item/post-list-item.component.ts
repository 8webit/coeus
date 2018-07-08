import { Component, Input } from '@angular/core';

import {has} from 'lodash';

import { PostModel } from '../shared/post.model';

@Component({
  selector: 'app-post-list-item',
  templateUrl: './post-list-item.component.html',
  styleUrls: ['./post-list-item.component.css']
})
export class PostListItemComponent {
  @Input() post: PostModel;
  @Input() settings: any;
  @Input() page: number;

  constructor() {}

  getFeatureImageUrl(feature_media: any): string {
    if ( has(feature_media.media_details.sizes, 'medium_large')) {
      return feature_media.media_details.sizes.medium_large.source_url;
    }else {
      return feature_media.source_url;
    }
  }
}
