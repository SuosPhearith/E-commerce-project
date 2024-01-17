import { PartialType } from '@nestjs/mapped-types';
import { CreateHeaderDto } from './create-header.dto';

export class UpdateHeaderDto extends PartialType(CreateHeaderDto) {}
