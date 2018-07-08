import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SidebarsModule } from '../../sidebars/sidebars.module';

// Components
import {SharedModule} from '../../shared/shared.module';
import {PostComponent} from './post.component';
import {PostAlfaComponent} from './post-alfa/post-alfa.component';
import { PostBetaComponent } from './post-beta/post-beta.component';
import { PostDeltaComponent } from './post-delta/post-delta.component';
import { PostEpsilonComponent } from './post-epsilon/post-epsilon.component';
import { PostGammaComponent } from './post-gamma/post-gamma.component';


@NgModule({
    imports: [
        CommonModule,
        SharedModule,
        SidebarsModule
    ],
    declarations: [
        PostComponent,
        PostAlfaComponent,
        PostBetaComponent,
        PostDeltaComponent,
        PostEpsilonComponent,
        PostGammaComponent
    ],
    exports: [
        PostComponent
    ]
})
export class PostModule { }
