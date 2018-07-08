import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PostBetaComponent } from './post-beta.component';

describe('PostBetaComponent', () => {
  let component: PostBetaComponent;
  let fixture: ComponentFixture<PostBetaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PostBetaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PostBetaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
