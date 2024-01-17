import { Module } from '@nestjs/common';
import { SlideService } from './slide.service';
import { SlideController } from './slide.controller';

@Module({
  controllers: [SlideController],
  providers: [SlideService],
})
export class SlideModule {}
