import {Injectable} from '@angular/core';
import {PostModel} from '../posts/shared/post.model';

@Injectable()
export class ThumbnailHelper {
    public static url(post: PostModel): string {
        const media = post._embedded['wp:featuredmedia'][0].media_details;

        if (!media.sizes) {
            return post._embedded['wp:featuredmedia'][0].source_url;
        }else if (media.sizes.large) {
            return media.sizes.large.source_url;
        }else if (media.sizes.medium) {
            return media.sizes.medium.source_url;
        }else if (media.sizes.full) {
          return media.sizes.full.source_url;
        }
    }
}