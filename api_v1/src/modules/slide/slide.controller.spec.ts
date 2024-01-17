import { Test, TestingModule } from '@nestjs/testing';
import { SlideController } from './slide.controller';
import { SlideService } from './slide.service';

describe('SlideController', () => {
  let controller: SlideController;

  beforeEach(async () => {
    const module: TestingModule = await Test.createTestingModule({
      controllers: [SlideController],
      providers: [SlideService],
    }).compile();

    controller = module.get<SlideController>(SlideController);
  });

  it('should be defined', () => {
    expect(controller).toBeDefined();
  });
});
