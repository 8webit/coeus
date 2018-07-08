import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PostGammaComponent } from './post-gamma.component';

describe('PostGammaComponent', () => {
  let component: PostGammaComponent;
  let fixture: ComponentFixture<PostGammaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PostGammaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PostGammaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
