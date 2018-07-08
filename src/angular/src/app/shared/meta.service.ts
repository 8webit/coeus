import { Injectable } from '@angular/core';
import { Meta } from '@angular/platform-browser';
import { PostModel } from '../posts/shared/post.model';

@Injectable()
export class MetaService {

    constructor(private meta: Meta) {}

    update(title: string, url: string, description: string, image?: string[], article = false) {
        description = description.replace(/<\/?[^>]+(>|$)/g, '');

        if (article) {
            this.meta.updateTag( {name: 'og:type', content: 'article'} );
        }else {
            this.meta.updateTag( {name: 'og:type', content: 'website'} );
        }

        this.meta.updateTag( {name: 'og:title', content: title} );
        this.meta.updateTag( {name: 'og:url', content: url} );
        this.meta.updateTag( {name: 'og:description', content: description} );

        if (image && image.length > 0) {
            this.meta.updateTag( {name: 'og:image', content: image[0]} );
            this.meta.updateTag( {name: 'og:image:width', content: image[1]} );
            this.meta.updateTag( {name: 'og:image:height', content: image[2]} );
        }
    }
}
